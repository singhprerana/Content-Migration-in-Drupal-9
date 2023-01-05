<?php

namespace Drupal\content_migration\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Provides a 'DisplayDate' migrate process plugin.
 *
 * Examples:
 *
 * @code
 * process:
 *  field_date:
 *    plugin: display_date
 *    source: blogDateVisibility
 * @endcode
 *
 * @see \Drupal\migrate\Plugin\MigrateProcessInterface
 *
 * @MigrateProcessPlugin(
 *   id = "display_date"
 * )
 */
class DisplayDate extends ProcessPluginBase {

  /**
   * To process the blog content visibility string.
   *
   * @param mixed $value
   *   The input value.
   * @param \Drupal\migrate\MigrateExecutableInterface $migrate_executable
   *   The migration in which this process is being executed.
   * @param \Drupal\migrate\Row $row
   *   The row from the source to process.
   * @param string $destination_property
   *   The destination property currently worked on. This is only used together
   *   with the $row above.
   *
   * @return int
   *   Returns 1 or 0 for radio field 'field_display_date'.
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // For source not empty and value 'Don’t show date on website',
    // set display_date 0. Else, set display_date value to 1.
    if (!empty($value) && $value === "Don’t show date on website") {
      $display_date = 0;
    }
    else {
      $display_date = 1;
    }
    $value = $display_date;
    // The final output of the plugin.
    return $value;
  }

}
