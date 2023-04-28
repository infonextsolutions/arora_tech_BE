<?php
//copies the file
function osc_copy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755)) {
    $result =true;
    if (is_file($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if (!file_exists($dest)) {
                cmfcDirectory::makeAll($dest,$options['folderPermission'],true);
            }
            $__dest=$dest."/".basename($source);
        } else {
            $__dest=$dest;
        }
        if(function_exists('copy')) {
            $result = @copy($source, $__dest);
        } else {
            $result=osc_copyemz($source, $__dest);
        }
        @chmod($__dest,$options['filePermission']);

    } elseif(is_dir($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if ($source[strlen($source)-1]=='/') {
                //Copy only contents
            } else {
                //Change parent itself and its contents
                $dest=$dest.basename($source);
                @mkdir($dest);
                @chmod($dest,$options['filePermission']);
            }
        } else {
            if ($source[strlen($source)-1]=='/') {
                //Copy parent directory with new name and all its content
                @mkdir($dest,$options['folderPermission']);
                @chmod($dest,$options['filePermission']);
            } else {
                //Copy parent directory with new name and all its content
                @mkdir($dest,$options['folderPermission']);
                @chmod($dest,$options['filePermission']);
            }
        }

        $dirHandle=opendir($source);
        $result = true;
        while($file=readdir($dirHandle)) {
            if($file!="." && $file!="..") {
                if(!is_dir($source."/".$file)) {
                    $__dest=$dest."/".$file;
                } else {
                    $__dest=$dest."/".$file;
                }
                //echo "$source/$file ||| $__dest<br />";
                $data = osc_copy($source."/".$file, $__dest, $options);
                if($data==false) {
                    $result = false;
                }
            }
        }
        closedir($dirHandle);

    } else {
        $result=true;
    }
    return $result;
}
/**
     * Creates a random password.
     * @param int password $length. Default to 8.
     * @return string
     */
    function osc_genRandomPassword($length = 8) {
        $dict = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        shuffle($dict);

        $pass = '';
        for($i = 0; $i < $length; $i++)
            $pass .= $dict[rand(0, count($dict) - 1)];

        return $pass;
    }

?>
<h2>Title</h2>
<?php 
include_once 'imageresizer.php';
include_once 'database/DAO.php';
include_once 'database/DBCommandClass.php';
include_once 'database/DBConnectionClass.php';
include_once 'database/DBRecordsetClass.php';
include_once 'database/ItemResource.php';
include_once 'database/ItemActions.php';
include_once 'database/hPreference.php';
include_once 'database/hSanitize.php';
include_once 'database/hValidate.php';
$itemResourceManager = ItemResource::newInstance();
echo "The table name is ".$_POST['table'];
echo "<br />";
$str = $_POST['area']."sq ft area available for Rent in ".$_POST['locality'];
echo $str;
echo "<br />";
$resourceId=NULL;
$itemId=23;
$total_size=NULL;
$array=$_FILES['photos'];
$path_name=$_FILES['photos']['tmp_name'];
$tmpName=$path_name[0];
//$path_normal ='uploads/'.$array['name'][0];
//echo $path_normal;
echo $tmpName;
// Create normal size
                                $normal_path = $path = $tmpName."_normal";
                                $size = explode('x', '640x480');
                                ImageResizer::fromFile($tmpName)->resizeTo($size[0], $size[1])->saveToFile($path);

                                
                                $sizeTmp = filesize($path);
                                
                                $total_size += $sizeTmp!==false?$sizeTmp:(5*1024);

// Create preview
                                $path = $tmpName."_preview";
                                $size = explode('x', '480x340');
                                ImageResizer::fromFile($normal_path)->resizeTo($size[0], $size[1])->saveToFile($path);
                                $sizeTmp = filesize($path);
                                $total_size += $sizeTmp!==false?$sizeTmp:(5*1024);

 // Create thumbnail
                                $path = $tmpName."_thumbnail";
                                $size = explode('x', '240x200');
                                ImageResizer::fromFile($normal_path)->resizeTo($size[0], $size[1])->saveToFile($path);
                                $sizeTmp = filesize($path);
                                $total_size += $sizeTmp!==false?$sizeTmp:(5*1024);
                                $itemResourceManager->insert(array(
                                        'fk_i_item_id' => $itemId
                                    ));
                                    $resourceId = $itemResourceManager->dao->insertedId();

                                osc_copy($tmpName.'_normal',  '../osc/oc-content/uploads/' . $resourceId . '.jpg');
                                    osc_copy($tmpName.'_preview',  '../osc/oc-content/uploads/' . $resourceId . '_preview.jpg');
                                    osc_copy($tmpName.'_thumbnail',  '../osc/oc-content/uploads/' . $resourceId . '_thumbnail.jpg');
                                    
                                        $path = '../osc/oc-content/uploads/' . $resourceId.'_original.jpg';
                                        move_uploaded_file($tmpName, $path);
                                        
                                        
                                   //perform update     
                                        
                                        
                                                     $s_path = 'oc-content/uploads/';
                                    $resourceType = 'image/jpeg';
                                    $itemResourceManager->update(
                                                            array(
                                                                's_path'            => $s_path
                                                                ,'s_name'           => osc_genRandomPassword()
                                                                ,'s_extension'      => 'jpg'
                                                                ,'s_content_type'   => $resourceType
                                                            )
                                                            ,array(
                                                                'pk_i_id'       => $resourceId
                                                                ,'fk_i_item_id' => $itemId
                                                            )
                                    );
                                   
?>

<h2>Description</h2>

