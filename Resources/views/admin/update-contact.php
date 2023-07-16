
<?php
    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <?php 
        if($crud === 'update_contact' && $idContact > 0 && $idContact <= $countOfContacts && isset($contact['contacts_id'])){
            $contact_picture = htmlspecialchars(IMG.'contacts/'.$contact['contacts_picture']);
            $contact_name = htmlspecialchars($contact['contacts_name']);
            $contact_company = htmlspecialchars($contact['companies_name']);
            $contact_email = htmlspecialchars($contact['contacts_email']);
            $contact_phone = htmlspecialchars($contact['contacts_phone']);
            $contact_created_at = htmlspecialchars($contact['contacts_created_at']);

    ?>
            <form id="update-contact" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="update-contact" value="update-contact-value">

                <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
                <fieldset class="crud-password">
                    <label for="update-contact__password">Password : </label>
                    <input type="text" name="update-contact__password" tabindex="-1" autocomplete="off">
                </fieldset>

                <label for="update-contact__picture">Picture : </label>
                <?php echo "<img src='$contact_picture' style='height:100px; width:100px;'>"; // ! style in HTML ?>
                <input type="file" id="update-contact__picture" name="update-contact__picture" max=255 accept="image/png, image/jpeg, image/jpg">

                <label for="update-contact__name">Complete name : </label>
                <input type="text" id="update-contact__name" name="update-contact__name" min=3 max=50 value="<?= $contact_name ?>" required>

                <label for="update-contact__company">Company : </label>
                <select name="update-contact__company" id="update-contact__company" required>
                    <option value="">-- Please choose a company --</option>
                    <?php 
                        foreach($companiesNames as $company){
                            if("$company[companies_name]" == $contact_company){
                                echo "<option value='$company[companies_name]' selected=selected>$company[companies_name]</option>";
                            }else{
                                echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                            }
                        }
                    ?>
                </select>

                <label for="email">Email : </label>
                <input type="email" id="update-contact__email" name="update-contact__email" min=8 max=50 value="<?= $contact_email ?>" required>

                <label for="update-contact__phone">Phone : </label>
                <input type="tel" id="update-contact__phone" name="update-contact__phone" min=10 max=50 value="<?= $contact_phone ?>" required>

                <input type="submit" id="update-contact__submit" value="Send update contact" onclick="return confirm('Is the encoded information correct ?')">
            </form>
    <?php
        }else{
            echo "<p>".NO_ENTRY." Contact the administrator.</p>";
            echo "<p><a href='".BASE_URL."dashboard'>Return to Dashboard</a></p>";
        }
    ?>

</main>