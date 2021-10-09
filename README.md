# Simple Autoloader for WordPress

An [autoloader](http://php.net/manual/en/language.oop5.autoload.php) that aims to be as simple as dropping it into your WordPress project. All you need is a well-organized project.

## More Information

The functions.php file can be left empty except for the include line ('autoload.php');

It no longer needs to be fed and you can create your functions in the functions folder.

The function.php file calls autoload.php which automatically loads all the files located in the functions folder of your theme.

You can also add PHP Classes in the classes folder.

You can change the name of these folders directly in the autoload.php file

### The Directory Structure

here is the directory structure:
```
+ theme
|
|   functions.php (call autoload.php)
|   autoload.php (call files to folder functions and files folder classes)
|       ...
|
|   functions (folder)
|       your-function.php (file)
|       ...
|       your-functions-folder (folder)
|           your-function.php (file)
|
|   classes (folder)
|       your-classes.php (file)
|       ...
|       your-classes-folder (folder)
|           your-classes.php (file)
|
```