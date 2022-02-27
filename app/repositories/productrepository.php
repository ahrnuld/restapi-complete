<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class ProductRepository extends Repository
{
    function getAll($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT * FROM product";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Product');
            $articles = $stmt->fetchAll();

            return $articles;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM product WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Product');
            $product = $stmt->fetch();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($product)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into product (name, price, description, image, category_id) VALUES (?,?,?,?,?)");

            $stmt->execute([$product->name, $product->price, $product->description, $product->image, $product->category_id]);

            $product->id = $this->connection->lastInsertId();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function update($product, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE product SET name = ?, price = ?, description = ?, image = ?, category_id = ? WHERE id = ?");

            $stmt->execute([$product->name, $product->price, $product->description, $product->image, $product->category_id, $id]);

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM product WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
