<?php

/**
 * Generates a random alphanumeric string.
 * 
 * @param  integer $length String length (number of characters)
 * 
 * @return string          The alphanumeric string
 */
function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  
  $randomString = '';
  for ($i=0; $i<$length; $i++)
  {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  
  return $randomString;
}

/**
 * Deletes all code files older than 7 days from "codes" directory
 * 
 * @return void
 */
function cleanOldFiles()
{
  // If codes directory exists
  if ($handle = opendir('codes'))
  {
    // We parse all of its files
    while (false !== ($fileName = readdir($handle)))
    {
      if ($fileName !== '.' && $fileName !== '..' && $fileName !== 'index.php')
      {
        // If code file is older than 7 days, we delete it
        if ( (date('U') - filemtime('codes/' . $fileName)) > 604800 ) unlink('codes/' . $fileName);
      }
    }
  }
}

// We clean all old code files
cleanOldFiles();

// We get the actual URL slug
$slug = substr($_SERVER['REQUEST_URI'], strripos($_SERVER['REQUEST_URI'], "/")+1);

// If the slug is null OR smaller than 3 characters OR does contain non-alphanumeric characters
if ($slug == '' || strlen($slug) < 3 || !ctype_alnum($slug))
{
  // We get the base URL of ShareCode
  $baseRequestURI = substr($_SERVER['REQUEST_URI'], 0, strripos($_SERVER['REQUEST_URI'], "/")+1);

  // We generate a new random slug (3 characters long)
  $slug = generateRandomString(3);

  // While this URL slug has already been used before
  while (file_exists("codes/" . $slug . ".txt"))
  {
    // We generate (again) a new random slug (3 characters long)
    $slug = generateRandomString(3);
  }
  
  // Redirects to the new URL (including the new slug)
  header('Location: ' . $baseRequestURI . generateRandomString(3));

  // Prevents any code to be shown during redirection
  exit();
}
