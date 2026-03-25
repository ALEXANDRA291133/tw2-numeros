<?php

class Request
{
    private $get;
    private $post;
    private $data = [];

    public function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
        $this->data = array_merge($get, $post);
    }

    public function getInt(string $key, int $default = null): ?int
    {
        if (isset($this->data[$key])) {
            $value = filter_var($this->data[$key], FILTER_VALIDATE_INT);
            if ($value !== false) {
                return $value;
            }
        }
        return $default;
    }

    public function validate(): array
    {
        $errors = [];
        $data = [];

        $n = $this->getInt('n');
        if ($n === null) {
            $errors[] = 'El campo n es requerido';
        } elseif ($n < 1 || $n > 1000) {
            $errors[] = 'El campo n debe ser un entero entre 1 y 1000';
        } else {
            $data['n'] = $n;
        }

        $min = $this->getInt('min');
        $max = $this->getInt('max');

        if ($min !== null && $max !== null) {
            if ($min >= $max) {
                $errors[] = 'El valor mínimo debe ser menor que el máximo';
            } else {
                $data['min'] = $min;
                $data['max'] = $max;
            }
        } elseif ($min !== null || $max !== null) {
            $errors[] = 'Debe proporcionar ambos valores: mínimo y máximo';
        } else {
            $data['min'] = 1;
            $data['max'] = 10000;
        }

        return ['errors' => $errors, 'data' => $data];
    }

    public function all(): array
    {
        return $this->data;
    }
}
