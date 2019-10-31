<?php

namespace DucLA\Admin\APILogViewer;

class APILog extends Model
{
  protected $fillable = ['user_id', 'path', 'method', 'ip', 'input'];

  public static $methodColors = [
      'GET'    => 'green',
      'POST'   => 'yellow',
      'PUT'    => 'blue',
      'DELETE' => 'red',
  ];

  public static $methods = [
      'GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'PATCH',
      'LINK', 'UNLINK', 'COPY', 'HEAD', 'PURGE',
  ];

  /**
   * Create a new Eloquent model instance.
   *
   * @param array $attributes
   */
  public function __construct(array $attributes = [])
  {
      $connection = config('admin.database.connection') ?: config('database.default');

      $this->setConnection($connection);

      $this->setTable(config('admin.database.api_log_table'));

      parent::__construct($attributes);
  }

  /**
   * Log belongs to users.
   *
   * @return BelongsTo
   */
  public function user() : BelongsTo
  {
      return $this->belongsTo(config('admin.auth.api_user_model'));
  }}