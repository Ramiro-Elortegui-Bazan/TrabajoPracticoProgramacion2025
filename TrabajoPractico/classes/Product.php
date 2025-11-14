<?php
class Product {
    private $id;
    private $name;
    private $price;
    private $stock;
    private $category;

    // propiedad estática para autoincrement
    private static $nextId = 1;

    public function __construct($id = null, $name = '', $price = 0.0, $stock = 0, $category = 'General') {
        if ($id === null) {
            $this->id = self::$nextId++;
        } else {
            $this->id = (int)$id;
            if ($id >= self::$nextId) {
                self::$nextId = $this->id + 1;
            }
        }
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }

    // getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getStock() { return $this->stock; }
    public function getCategory() { return $this->category; }

    // setters
    public function setName($v) { $this->name = $v; }
    public function setPrice($v) { $this->price = (float)$v; }
    public function setStock($v) { $this->stock = (int)$v; }
    public function setCategory($v) { $this->category = $v; }

    // ejemplo de método
    public function isInStock() {
        return $this->stock > 0;
    }

    // toArray para guardar en JSON
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'category' => $this->category,
        ];
    }

    // método estático de utilidad
    public static function createFromArray(array $arr) {
        return new self($arr['id'] ?? null, $arr['name'] ?? '', $arr['price'] ?? 0, $arr['stock'] ?? 0, $arr['category'] ?? 'General');
    }
}
