<?php
    include '../Resources/views/includes/header.php';
?> 
    <main id="main">
        <?php 
            foreach($allContacts as $contact){
                echo "<ul>";
                    echo "<li>$contact[name]</li>";
                    echo "<li>$contact[company_id]</li>";
                    echo "<li>$contact[email]</li>";
                    echo "<li>$contact[phone]</li>";
                    echo "<li>$contact[created_at]</li>";
                    echo "<li>$contact[updated_at]</li>";
                echo "</ul>";
            }
        
            // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at
        ?>
    </main>
    <footer id="footer">
    </footer>
</body>
</html>