<?

use Libs\App;
require_once 'app/libs/Bootstrap.php';

ob_start();
$app=new App();
$content=ob_get_contents();
ob_end_clean();

App::finish($content);