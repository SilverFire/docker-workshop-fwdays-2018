# Task

Enhance image to support XDebug configuration with environment params.
The following params must be supported:

- `ENV`: when not set to `dev`, XDebug MUST be disabled
- `XDEBUG_REMOTE_HOST`: must be set to `xdebug.remote_host` setting of XDebug config
- `XDEBUG_REMOTE_PORT`: must be set to `xdebug.remote_port` setting of XDebug config

