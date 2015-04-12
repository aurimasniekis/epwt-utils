# EPWT Utils

### Includes:

  * Symfony Console command basic statistics time elapsed and memory usage (No configuration needed)
  * Symfony Console Output writeln with sprintf Trait [Tutorial](Resources/docs/output_formatted_trait.md)
  
### Instalation

    composer require epwt/utils dev-master
    
If you use Symfony include it in `AppKernel.php`

	$bundles[] = new EPWT\UtilsBundle\EPWTUtilsBundle();
	