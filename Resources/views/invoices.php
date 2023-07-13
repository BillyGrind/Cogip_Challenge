<?php

use App\Core\DatabaseManager;

    include VIEWS.'includes/header.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
?>
<main>
    <div class="table-shape">
        <div class="test-clip">
        </div>
    </div>
    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
        <div class="table-title underlined">
            <h2>All invoices</h2>
        </div>
        <form action="invoices" method="GET">
            <input type="text" name="search" placeholder="Search company" id="submit_input">
            <input type="submit" id="submit_btn">
            <!-- Bouton submit à cacher en CSS -->
        </form>

        <?php if (!is_null($invoicesLimitedPerPage) && count($invoicesLimitedPerPage) > 0) : ?>
            <?php foreach ($invoicesLimitedPerPage as $result) : ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>

        <table class="table">
            <thead class="tableHead">
                <th>Invoice number</th>
                <th>Due date</th>
                <th>Company</th>
                <th>Price</th>
                <th>Created at</th>
            </thead>
            <?php
            foreach ($invoicesLimitedPerPage as $invoice) {
                $dateFormated_created = dateFormat($invoice['invoices_created_at']);
                $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                echo "<tr>";
                echo "<td>$invoice[invoices_ref]</td>";
                echo "<td>$dateFormated_due</td>";
                echo "<td>$invoice[companies_name]</td>";
                echo "<td>$invoice[invoices_price]</td>";
                echo "<td>$dateFormated_created</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <?php
    include VIEWS . 'includes/pagination.php';
    ?>
</main>
    <?php
        include 'includes/footer.php';
    ?>
</body>