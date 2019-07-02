<?php

class QueryBuilder
{
	protected $pdo;

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}


	public function selectAll($table)
	{
		$statement = $this->pdo->prepare("select * from $table");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function selectById($table, $id)
	{
		$statement = $this->pdo->prepare("select * from $table where id={$id}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ)[0];
	}

	public function insert($table, $parameters)
	{
		$sql = sprintf('insert into %s (%s) values (%s)',
			$table,
			implode(', ', array_keys($parameters)),
			':'.implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($sql);

			$statement->execute($parameters);
            
            $st = $this->pdo->prepare('SELECT LAST_INSERT_ID() AS id');
            $st->execute();
            
            return $st->fetchAll(PDO::FETCH_OBJ)[0]->id;
		} catch(Exception $e) {
			die($e->getMessage());
			
		}
	}

	public function update($table, $parameters, $id)
	{
		$setStatement = '';
		foreach ($parameters as $column => $value) {
			$setStatement = $setStatement . $column . '=' . "'$value',"
			;
		}

		$sql = "update {$table} SET {$setStatement} where id=$id;";
		
		try {
			$statement = $this->pdo->prepare($sql);

			$statement->execute();	
		} catch(Exception $e) {
			die($e->getMessage());
			
		}
	}

	public function delete($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id={$id}";
		
		try {
			$statement = $this->pdo->exec($sql);
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
}