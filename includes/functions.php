<?php
include_once "config.php";

function compileAPK($data)
{
  $base_dir = BASE_DIR;
  $appName = removeSpecialChar($data['appName']);
  $panelCode = $data['panelCode'];

  $save_dir = $base_dir . "apks/{$panelCode}";
  $temp_dir = $base_dir . "temp/{$panelCode}";

  shell_exec("mkdir " . $temp_dir);
  shell_exec("cp - R {$base_dir}base_apk/* {$temp_dir}");

  $result = shell_exec("apktool b -f -o {$save_dir}/{$appName}_{$panelCode}.apk {$temp_dir}");

  shell_exec("rm -rf {$temp_dir}");
  return $result;
}

function singAPK($data)
{
  $base_dir = BASE_DIR;
  $appName = removeSpecialChar($data['appName']);
  $panelCode = $data['panelCode'];
  $resource_dir = "{$base_dir}apktool/Resources/";

  $apk_path = "{$base_dir}apks/{$panelCode}/{$appName}_{$panelCode}.apk";

  $result = shell_exec("");
}

function removeSpecialChar($string)
{
  $caracteres_sem_acento = array(' ' => '_', 'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', '' => 'Z', '' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ń' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ń' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f', 'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',);
  $result = preg_replace("/[^a-zA-Z0-9_]/", "", strtr($string, $caracteres_sem_acento));

  return $result;
}
