# OpenConext-logogenerator

## Usage
In the bin folder the script can generate logo images from the service registry and place these in a 'cached' directory on the 'www'-directories.

The command usage is 
`bin/logogenerator.php`

The command will ask you for the required parameters. For the purpose of putting this command in a cronjob these parameters can also be given as arguments:

* -s <url>: Service Registry URL to the connections JSON
* -u <username>: Service Registry HTTP username
* -p <password>: Service Registry HTTP password
