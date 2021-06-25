<div id="modal-add-user" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-2 w3-light-grey" style="max-width:600px;">
            <div class="w3-container w3-blue-grey">
                <h2>Register User</h2>
            </div>
            <form action="<?=url('admin/userRegister')?>" method="post">
            <div class="w3-container">
                <div class="w3-padding">
                    <p><input class="w3-input w3-round-xlarge" type="text" name="first_name" value="<?=$_GET['first_name'] ?? ''?>" placeholder="First Name"></p>
                    <p><input class="w3-input w3-round-xlarge" type="text" name="last_name" value="<?=$_GET['last_name'] ?? ''?>" placeholder="Last Name"></p>
                    <p><input class="w3-input w3-round-xlarge" type="email" name="email" value="<?=$_GET['email'] ?? ''?>" placeholder="Email"></p>
                    <p><input class="w3-input w3-round-xlarge" type="password" name="password" placeholder="Password"></p>
                    <p><input class="w3-input w3-round-xlarge" type="password" name="passwordRepeat" placeholder="Password confirm"></p>
                </div>
            </div>
            <div class="w3-container w3-padding">
                <span class="w3-col s6 w3-padding">
                    <button class="w3-button w3-white w3-block w3-text-red" type="button" onclick="w3_close('modal-add-user')">Cancel</button>
                </span>
                <span class="w3-col s6 w3-padding">
                    <button class="w3-button w3-white w3-block w3-text-blue" type="submit">Register</button>
                </span>        
            </div>
            </form>          
    </div>
</div>