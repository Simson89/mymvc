<h2>Admin control panel</h2>

<?php
                        if (Session::get('adm_loggedIn') == true) {
                            echo "<p class='navbar-text pull-right'>Logged in as <a href='#' class='navbar-link'>".Session::get('admin')."</a> <a href='".URL."control/logout'>(logout)</a></p>";
                        }
                        else {
                        echo "<form class='navbar-form pull-right' action=".URL."admin/login method='post'>";
                        echo "<input class='span2' type='text' placeholder='Login' name='login'>";
                        echo "<input class='span2' type='password' placeholder='Password' name='password'>";
                        echo "<button type='submit' class='btn'>Sign in</button>";
                        echo '</form>';
                         
                        }
                        
                    
