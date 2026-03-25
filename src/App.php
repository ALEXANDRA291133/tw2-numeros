<?php

class App
{
    private $request;
    private $renderer;

    public function __construct(Request $req, Renderer $renderer)
    {
        $this->request = $req;
        $this->renderer = $renderer;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $this->handlePost();
        } else {
            $this->handleGet();
        }
    }

    private function handlePost(): void
    {
        $validation = $this->request->validate();

        if (empty($validation['errors'])) {
            $data = $validation['data'];
            $generator = new RandomGenerator($data['n'], $data['min'], $data['max']);
            $numbers = $generator->generate();

            $_SESSION['results'] = [
                'numbers' => $numbers,
                'stats' => [
                    'sum' => $generator->getSum(),
                    'average' => $generator->getAverage(),
                    'min' => $generator->getMin(),
                    'max' => $generator->getMax()
                ],
                'input' => $data
            ];
        } else {
            $_SESSION['errors'] = $validation['errors'];
            $_SESSION['previous_input'] = $this->request->all();
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    private function handleGet(): void
    {
        $results = isset($_SESSION['results']) ? $_SESSION['results'] : null;
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        $previousInput = isset($_SESSION['previous_input']) ? $_SESSION['previous_input'] : [];

        unset($_SESSION['results']);
        unset($_SESSION['errors']);
        unset($_SESSION['previous_input']);

        echo '<!DOCTYPE html>';
        echo '<html lang="es">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Generador de Números Aleatorios</title>';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '</head>';
        echo '<body>';
        echo '<div class="container mt-5">';
        echo '<h1 class="mb-4 text-center">Generador de Números Aleatorios</h1>';

        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                echo '<p class="mb-0">' . $this->escape($error) . '</p>';
            }
            echo '</div>';
        }

        echo $this->renderer->renderForm($previousInput);

        if ($results !== null) {
            echo $this->renderer->renderResults($results['numbers'], $results['stats'], $results['input']);
        }

        echo '</div>';
        echo '</body>';
        echo '</html>';
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
