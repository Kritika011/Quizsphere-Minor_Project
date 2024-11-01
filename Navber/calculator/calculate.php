<?php
// Function to evaluate a simple mathematical expression securely
function evaluateExpression($expression)
{
    // Remove any characters that are not allowed
    $expression = preg_replace('/[^0-9+\-*/().^%sin|cos|tan ]/', '', $expression);

    // Evaluate the expression safely
    // NOTE: This example uses eval for simplicity; replace with a parser library for production use.
    // Avoid using eval() in production code without strict checks!
    if (preg_match('/^[0-9+\-*/().^%sin|cos|tan ]+$/', $expression)) {
        try {
            $result = eval ('return ' . $expression . ';');
            return htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        } catch (Throwable $e) {
            return 'Error in calculation!';
        }
    } else {
        return 'Invalid expression!';
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['expression'])) {
        $expression = $_POST['expression'];
        echo evaluateExpression($expression);
    } else {
        echo 'No expression provided!';
    }
} else {
    echo 'Invalid request method!';
}
?>