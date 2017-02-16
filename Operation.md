Operation manual
=================

# Configuration

You need to set some environment variables in order to configure the Feature Extractor daemon, such as in the following example:

* `IDOS_VERSION`: indicates the version of idOS API to use (default: '1.0');
* `IDOS_DEBUG`: indicates whether to enable debugging (default: false);
* `IDOS_LOG_FILE`: is the path for the generated log file (default: 'log/cra.log');
* `IDOS_GEARMAN_SERVERS`: a list of gearman servers that the daemon will register on (default: 'localhost:4730');
* `IDOS_SQL_DRIVER`: indicates the SQL database driver to use (default: 'psql');
* `IDOS_SQL_HOST`: the SQL database server host name (default: 'localhost');
* `IDOS_SQL_PORT`: the SQL database server port (default: 5432);
* `IDOS_SQL_NAME`: the SQL database name (default: 'idos-feature');
* `IDOS_SQL_USER`: the username used to authenticate within the SQL server (default: 'idos-feature');
* `IDOS_SQL_PASS`: the password used to authenticate within the SQL server (default: 'idos-feature').

You may also set these variables using a `.env` file in the project root.

# Running

In order to start the Feature Extractor daemon you should run in the terminal:

```
./feature-cli.php feature:daemon [-d] [-l path/to/log/file] handlerPublicKey handlerPrivateKey functionName serverList
```

* `handlerPublicKey`: public key of the handler registered within idOS
* `handlerPrivateKey`: private key of the handler registered within idOS
* `functionName`: gearman function name
* `serverList`: a list of the gearman servers
* `-d`: enable debug mode
* `-l`: the path for the log file

Example:

```
./feature-cli.php feature:daemon -d -l log/cra.log ef970ffad1f1253a2182a88667233991 213b83392b80ee98c8eb2a9fed9bb84d feature localhost
```
