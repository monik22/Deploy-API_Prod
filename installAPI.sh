echo "Unzipping Package... ;)"
# Getting current package Number
package="$1"
mkdir $HOME/Packages/temp/
mkdir $HOME/Desktop/GoliathAPIServer

tar -xzf $HOME/Packages/$package -C $HOME/Packages/temp/
echo "Installing API.. how exciting -_-"
	cp -a -v $HOME/Packages/temp/* $HOME/Desktop/GoliathAPIServer/
echo "Adjusting RabbitMQ .ini..."
	sed -i '2s/.*/BROKER_HOST = 192.168.2.21/g' $HOME/Desktop/GoliathAPIServer/apiRabbitMQ.ini
echo "API Package Sucessfully Installed!"

