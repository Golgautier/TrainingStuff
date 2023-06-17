<? include "functions.php" ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
        <div id=maintitle>
            <image src="images/ntnx_logo.png" />
            <p>Cloud-native training day 3</p>
        </div>
            <?php
                $detail=false;
                $var_name = getenv('MYNAMEIS');
                $var_password = getenv('MYPASSWORDIS');
                $var_labnumber = getenv('LAB_NUMBER');


                if ( ! is_numeric($var_labnumber))
                {
                    ?>
                    <div id="error" >
                    <img id="status" src="images/ko.png" />Error, you probably have not set LAB_NUMBER env variable<img id="status" src="images/ko.png" />
                    </div>
                    <?
                    exit;
                }

                $filename="/data/MyData.txt";
                $pvpath="/pvdata";
                $filename2=$pvpath."/data.txt";

                # Check if we use localhost to connect
                if ( $_SERVER['SERVER_NAME'] != "localhost" )
                {
                    $var_loadbalancer = true;
                }
                else
                {
                    $var_loadbalancer = false;
                }

                
                // Check if we use IP to connect
                if ( filter_var( $_SERVER['SERVER_NAME'], FILTER_VALIDATE_IP ) )
                {
                    $var_ingress = false;
                }
                else
                {
                    $var_ingress = true;
                }

                if( ( file_exists( $filename) ) && ($file = fopen( $filename,"r" )))
                {
                    $var_datatxt=fread($file,filesize($filename));
                    fclose($file);
                }

                if( ( file_exists( $filename2) ) && ($file = fopen( $filename2,"r" )))
                {
                    $var_pvdatatxt=fread($file,filesize($filename2));
                    fclose($file);
                }

                if( file_exists( $pvpath ))
                {
                    $var_pvpresent=true;
                }

                if (($var_name!="") || ($var_datatxt!=""))
                {
                    $details=true;
                }

                if ( ! $details )
                {
                    ?>
                    <div id="welcome"> 
                        <image src="images/welcome.gif" />
                    </div>
                    <?
                }
                else
                {
                $image = "images/".$var_labnumber.".gif";

                if ( ! file_exists($image) )
                {
                    $image = "images/default.gif";
                }

                ?>
                <div id="display_values">
                    <div id="dv_image">
                        <image src="<? print($image) ?>" />
                    </div>
                    <div id="dv_infos">
                        <ul>
                            <li>Validation for lab <? print("$var_labnumber") ?></li>
                            <? if ($var_labnumber >= 2 ) { DisplayValue( "Environment variable 'MYNAMEIS'",$var_name); } ?>
                            <? if ($var_labnumber >= 2 ) { DisplayValue( "Content of '".$filename."'",$var_datatxt); } ?>
                            <? if ($var_labnumber >= 3 ) { DisplayValue( "Environment variable 'MYPASSWORDIS'",$var_password); } ?>
                            <? if ($var_labnumber >= 4 ) { DisplayValue( "PV mounted in '".$pvpath."'",$var_pvpresent); } ?>
                            <? if ($var_labnumber >= 4 ) { DisplayValue( "Content of '".$filename2."'",$var_pvdatatxt); } ?>
                            <? if ($var_labnumber >= 8 ) { DisplayValue( "Access without portforwarding",$var_loadbalancer); } ?>
                            <? if ($var_labnumber >= 9 ) { DisplayValue( "Access with ingress",$var_ingress); } ?>
                    </div>
                </div>
                <?
                }
            ?>
            <? //   phpinfo() ?>
        </div>
    </body>
</html>