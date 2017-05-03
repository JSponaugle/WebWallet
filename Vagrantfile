Vagrant.configure("2") do |config|
	
	# Specify the base box
	config.vm.box = "ubuntu/xenial64"
	
	# Setup port forwarding
	config.vm.network :private_network, id: "vvv_primary", ip: "192.168.50.160"
    config.vm.provider :hyperv do |v, override|
      override.vm.network :private_network, id: "vvv_primary", ip: nil
    end

    # Setup synced folder
    config.vm.synced_folder "./", "/var/www", create: true, group: "www-data", owner: "www-data"

    # VM specific configs
    config.vm.provider "virtualbox" do |v|
    	v.name = "WebWallet"
    	v.customize ["modifyvm", :id, "--memory", "1024"]
    	v.customize ["modifyvm", :id, "--cpus", 1]
    end

    # Shell provisioning
    config.vm.provision "shell" do |s|
    	s.path = "provision/setup.sh"
    end
end