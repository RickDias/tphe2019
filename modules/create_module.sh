# #!/bin/sh
# #cria modulos
#
# mkdir $1;
# z=${1^} # capitalize the first letter
# cd $1
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);  
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
#
# mkdir classes
# cd classes
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
#
# echo '<?php
# namespace '$z';
#
# class '$z'{
#
# }
# ?>' >> $z'.php';
#
# cd ..
#
# mkdir controllers
# cd controllers
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
#
# echo '<?php
# class '$z'Controller{
#
# }
# ?>' >> $z'Controller.php';
# cd ..
# mkdir js
# cd js
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
# cd ..
# mkdir css
# cd css
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
# cd ..
# mkdir views
# cd views
# echo '<?php
# header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
# header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
#
# header("Cache-Control: no-store, no-cache, must-revalidate");
# header("Cache-Control: post-check=0, pre-check=0", false);
# header("Pragma: no-cache");
#
# header("Location: ../");
# exit;' >> index.php;
