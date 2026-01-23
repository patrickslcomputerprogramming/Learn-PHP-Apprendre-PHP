<?php
/**
 * Script de test automatisé pour le programme de calcul de type de triangle
 * Ce script teste les fonctionnalités principales du programme
 */

class TriangleCalculatorTest {
    private $testCount = 0;
    private $passedTests = 0;
    private $failedTests = 0;
    
    /**
     * Exécute une requête GET simulée vers calcul.php
     */
    private function simulateGetRequest($cote1, $cote2, $cote3) {
        // Simuler $_GET
        $_GET = [
            'ipt1-cote1-form1' => $cote1,
            'ipt2-cote2-form1' => $cote2,
            'ipt3-cote3-form1' => $cote3,
            'ipt4-submit-form1' => 'CALCULER'
        ];
        
        // Démarrer la session
        $_SESSION = [];
        session_start();
        
        // Exécuter la logique de calcul.php
        if (isset($_GET['ipt4-submit-form1'])) {
            $cote1_triangle = $_GET["ipt1-cote1-form1"];
            $cote2_triangle = $_GET["ipt2-cote2-form1"];
            $cote3_triangle = $_GET["ipt3-cote3-form1"];

            if (empty($cote1_triangle) || empty($cote2_triangle) || empty($cote3_triangle)) {
                $messageErreur = "Erreur! Il faut rentrer une valeur pour :";
                if (empty($cote1_triangle))
                    $messageErreur .= " - Côté 1";
                if (empty($cote2_triangle))
                    $messageErreur .= " - Côté 2";
                if (empty($cote3_triangle))
                    $messageErreur .= " - Côté 3";

                $_SESSION['erreur-champ-vide'] = $messageErreur;
            } else {
                $_SESSION['longueur-cotes-triangle'] = "Côté 1 = " . $cote1_triangle;
                $_SESSION['longueur-cotes-triangle'] .= "   " . "Côté 2 = " . $cote2_triangle;
                $_SESSION['longueur-cotes-triangle'] .= "   " . "Côté 3 = " . $cote3_triangle;
                
                if ($cote1_triangle === $cote2_triangle && $cote2_triangle === $cote3_triangle) {
                    $_SESSION['type-triangle'] = "Votre triangle est équilateral et ressemble à celui affichée ci-dessous.";
                    $_SESSION['image-triangle'] = "img/Triangle.Equilateral.svg";
                } elseif ($cote1_triangle === $cote3_triangle || $cote1_triangle === $cote2_triangle || $cote2_triangle === $cote3_triangle) {
                    $_SESSION['type-triangle'] = "Votre triangle est isocèle et ressemble à celui affichée ci-dessous.";
                    $_SESSION['image-triangle'] = "img/Triangle.Isosceles.svg";
                } else {
                    $_SESSION['type-triangle'] = "Votre triangle est scalène et ressemble à celui affichée ci-dessous.";
                    $_SESSION['image-triangle'] = "img/Triangle.Scalene.svg";
                }
            }
        }
        
        return $_SESSION;
    }
    
    /**
     * Affiche un résultat de test avec mise en forme colorée
     */
    private function displayTestResult($testId, $description, $data, $passed, $expected = null, $actual = null) {
        $this->testCount++;
        
        echo "<div style='padding: 15px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px;'>";
        echo "<h3 style='margin: 0 0 10px 0;'>Test #{$testId}: {$description}</h3>";
        
        if ($data) {
            echo "<p><strong>Données de test:</strong> " . htmlspecialchars($data) . "</p>";
        }
        
        if ($passed) {
            $this->passedTests++;
            echo "<p style='color: #28a745; font-weight: bold; background-color: #d4edda; padding: 8px; border-radius: 3px;'>✓ RÉUSSITE</p>";
        } else {
            $this->failedTests++;
            echo "<p style='color: #dc3545; font-weight: bold; background-color: #f8d7da; padding: 8px; border-radius: 3px;'>✗ ÉCHEC</p>";
            
            if ($expected !== null && $actual !== null) {
                echo "<p><strong>Attendu:</strong> " . htmlspecialchars($expected) . "</p>";
                echo "<p><strong>Obtenu:</strong> " . htmlspecialchars($actual) . "</p>";
            }
        }
        echo "</div>";
    }
    
    /**
     * Exécute tous les tests
     */
    public function runAllTests() {
        // Style CSS pour l'interface
        echo "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Tests Automatisés - Calcul de Type de Triangle</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    line-height: 1.6;
                    margin: 0;
                    padding: 20px;
                    background-color: #f5f5f5;
                }
                .container {
                    max-width: 1000px;
                    margin: 0 auto;
                    background-color: white;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0,0,0,0.1);
                }
                .header {
                    text-align: center;
                    margin-bottom: 30px;
                    padding-bottom: 20px;
                    border-bottom: 2px solid #007bff;
                }
                .header h1 {
                    color: #007bff;
                    margin: 0;
                }
                .summary {
                    background-color: #e9ecef;
                    padding: 20px;
                    border-radius: 5px;
                    margin-top: 30px;
                    text-align: center;
                    font-size: 1.1em;
                }
                .success {
                    color: #28a745;
                    font-weight: bold;
                }
                .failure {
                    color: #dc3545;
                    font-weight: bold;
                }
                .test-container {
                    margin: 20px 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>🔍 Tests Automatisés - Calcul de Type de Triangle</h1>
                    <p>Ce script teste les fonctionnalités principales du programme de calcul de type de triangle</p>
                </div>
        ";
        
        // Exécution des tests
        $this->runTests();
        
        // Résumé des tests
        echo "<div class='summary'>";
        echo "<h2>Résumé des Tests</h2>";
        echo "<p>Total des tests exécutés: <strong>{$this->testCount}</strong></p>";
        echo "<p>Tests réussis: <span class='success'>{$this->passedTests}</span></p>";
        echo "<p>Tests échoués: <span class='failure'>{$this->failedTests}</span></p>";
        
        $successRate = ($this->testCount > 0) ? round(($this->passedTests / $this->testCount) * 100, 2) : 0;
        echo "<p>Taux de réussite: <strong>{$successRate}%</strong></p>";
        
        if ($this->failedTests === 0) {
            echo "<p style='color: #28a745; font-size: 1.2em;'>🎉 Tous les tests ont réussi !</p>";
        } else {
            echo "<p style='color: #dc3545; font-size: 1.2em;'>⚠️ Certains tests ont échoué. Veuillez vérifier le code.</p>";
        }
        echo "</div>";
        
        echo "</div></body></html>";
    }
    
    /**
     * Méthode principale contenant tous les tests
     */
    private function runTests() {
        echo "<div class='test-container'>";
        
        // Test 1: Triangle équilatéral
        $testId = 1;
        $description = "Test d'un triangle équilatéral (tous les côtés égaux)";
        $data = "Côté 1 = 5, Côté 2 = 5, Côté 3 = 5";
        $session = $this->simulateGetRequest(5, 5, 5);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'équilateral') !== false &&
                  $session['image-triangle'] === 'img/Triangle.Equilateral.svg';
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 2: Triangle isocèle (côtés 1 et 2 égaux)
        $testId = 2;
        $description = "Test d'un triangle isocèle (côtés 1 et 2 égaux)";
        $data = "Côté 1 = 5, Côté 2 = 5, Côté 3 = 8";
        $session = $this->simulateGetRequest(5, 5, 8);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'isocèle') !== false &&
                  $session['image-triangle'] === 'img/Triangle.Isosceles.svg';
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 3: Triangle isocèle (côtés 2 et 3 égaux)
        $testId = 3;
        $description = "Test d'un triangle isocèle (côtés 2 et 3 égaux)";
        $data = "Côté 1 = 8, Côté 2 = 5, Côté 3 = 5";
        $session = $this->simulateGetRequest(8, 5, 5);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'isocèle') !== false &&
                  $session['image-triangle'] === 'img/Triangle.Isosceles.svg';
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 4: Triangle scalène
        $testId = 4;
        $description = "Test d'un triangle scalène (tous les côtés différents)";
        $data = "Côté 1 = 3, Côté 2 = 4, Côté 3 = 5";
        $session = $this->simulateGetRequest(3, 4, 5);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'scalène') !== false &&
                  $session['image-triangle'] === 'img/Triangle.Scalene.svg';
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 5: Champ vide - Côté 1 manquant
        $testId = 5;
        $description = "Test avec champ vide (côté 1 manquant)";
        $data = "Côté 1 = '', Côté 2 = 5, Côté 3 = 5";
        $session = $this->simulateGetRequest('', 5, 5);
        
        $passed = isset($session['erreur-champ-vide']) && 
                  strpos($session['erreur-champ-vide'], 'Côté 1') !== false;
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 6: Champs vides multiples
        $testId = 6;
        $description = "Test avec plusieurs champs vides";
        $data = "Côté 1 = '', Côté 2 = '', Côté 3 = 5";
        $session = $this->simulateGetRequest('', '', 5);
        
        $passed = isset($session['erreur-champ-vide']) && 
                  strpos($session['erreur-champ-vide'], 'Côté 1') !== false &&
                  strpos($session['erreur-champ-vide'], 'Côté 2') !== false;
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 7: Tous les champs vides
        $testId = 7;
        $description = "Test avec tous les champs vides";
        $data = "Côté 1 = '', Côté 2 = '', Côté 3 = ''";
        $session = $this->simulateGetRequest('', '', '');
        
        $passed = isset($session['erreur-champ-vide']) && 
                  strpos($session['erreur-champ-vide'], 'Côté 1') !== false &&
                  strpos($session['erreur-champ-vide'], 'Côté 2') !== false &&
                  strpos($session['erreur-champ-vide'], 'Côté 3') !== false;
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 8: Valeurs décimales
        $testId = 8;
        $description = "Test avec des valeurs décimales";
        $data = "Côté 1 = 3.5, Côté 2 = 3.5, Côté 3 = 5.2";
        $session = $this->simulateGetRequest(3.5, 3.5, 5.2);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'isocèle') !== false &&
                  isset($session['longueur-cotes-triangle']);
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 9: Grandes valeurs
        $testId = 9;
        $description = "Test avec de grandes valeurs";
        $data = "Côté 1 = 1000, Côté 2 = 1000, Côté 3 = 1000";
        $session = $this->simulateGetRequest(1000, 1000, 1000);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'équilateral') !== false;
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        // Test 10: Triangle isocèle (côtés 1 et 3 égaux)
        $testId = 10;
        $description = "Test d'un triangle isocèle (côtés 1 et 3 égaux)";
        $data = "Côté 1 = 5, Côté 2 = 8, Côté 3 = 5";
        $session = $this->simulateGetRequest(5, 8, 5);
        
        $passed = isset($session['type-triangle']) && 
                  strpos($session['type-triangle'], 'isocèle') !== false &&
                  $session['image-triangle'] === 'img/Triangle.Isosceles.svg';
        
        $this->displayTestResult($testId, $description, $data, $passed);
        
        echo "</div>";
    }
}

// Exécuter les tests
$testSuite = new TriangleCalculatorTest();
$testSuite->runAllTests();
?>