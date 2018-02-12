<?php 

namespace iqbalhs\hungarian;

final class Hungarian 
{
    public $matrix = [];

    protected $reduced = [];

    function __construct(array $matrix) {
        $this->validate($matrix);
        $this->reduced = $this->matrix = $matrix;
    }

    protected function validate(array $matrix)
    {
        if (!is_array($matrix)) {
            throw new \Exception('Invalid format for matrix');
        }
        return true;
    }

    public function reduce()
    {
        foreach ($this->reduced as $row => $cells) {
            $min = min($cells);
            foreach ($cells as $column => $cell) {
                $this->reduced[$row][$column] -= $min;
            }
        }
        $transposed = array_map(null, ...$this->reduced);
        foreach ($this->reduced as $column => $cells) {
            $min = min($cells);
            foreach ($cells as $row => $cell) {
                $this->reduced[$row][$column] -= $min;
            }
        }
    }

    public function getReduced()
    {
        return $this->reduced;
    }

    public function print()
    {
        foreach ($this->matrix as $data) {
            print(implode(' ,', $data) . "\n");
        }
    }

    public function solve()
    {
        $this->reduce();
        // TODO continue to next step after reduced it
    }
}