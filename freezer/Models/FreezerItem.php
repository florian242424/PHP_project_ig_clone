<?php
class Models_FreezerItem extends Models_Base {
    public function findAll() {
        $statement = "
        SELECT id, name, entry, description, exp
        FROM FreezerItem;
        ";

        $result = $this->connection->query($statement);
        return array_map(function ($data) {
            return new Domains_FreezerItem($data);
        }, $result->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findById($id) {
        $statement = "
        SELECT id, name, entry, description, exp
        FROM FreezerItem
        WHERE id = :id;
        ";

        $result = $this->connection->prepare($statement);
        $result->execute([":id" => $id]);
        $data = $result->fetch(PDO::FETCH_ASSOC);

        if ($data){
            return new Domains_FreezerItem($data);
        } else {
            throw new Exceptions_NotFound();
        }
    }

    public function insert(Domains_FreezerItem $item) {
        $query = "INSERT INTO FreezerItem (name, entry, description, exp)
                  VALUES(:name, :entry, :description, :exp);";
        $statement = $this->connection->prepare($query);
        $statement->execute([
            ":name" => $item->name,
            ":entry" => $item->entry,
            ":description" => $item->description,
            ":exp" => $item->exp
        ]);
        $last_id = $this->connection->lastInsertId();
        return $this->findById($last_id);
    }

    public function update(Domains_FreezerItem $item) {
        $query = "
        UPDATE FreezerItem
        SET name = :name, entry = :entry, description = :description, exp = :exp
        WHERE id = :id;
        ";

        $statement = $this->connection->prepare($query);
        $statement->execute([
            ":name" => $item->name,
            ":entry" => $item->entry,
            ":description" => $item->description,
            ":exp" => $item->exp,
            ":id" => $item->id
        ]);
        return $this->findById($item->id);
    }

    public function delete($id) {
        $query = "DELETE FROM FreezerItem WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->execute([":id" => $id]);
    }
}