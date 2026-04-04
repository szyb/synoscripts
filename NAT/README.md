# Introduction
This is an instruction how make Synology device to work as a router (with NAT translating) in DSM 6.x & 7.x. The only requirement for device is to have at least 2 LAN ports.

# Requirements
* root access
* basic DSM configuration skills
* device with at least 2 LAN ports, while one is connected to WAN/LAN with Internet connection

# Instruction
* We assume that eth0 (or ovs_eth0 when using Open vSwitch) is the interface we use to connect to the Internet
* Setup the second LAN with static IP (Control Panel => Network => Network Interface tab), i.e. 192.168.1.1
* Now go to the Control Panel and choose Task Scheduler
* Create new Triggered task => User-defined script, name it (i.e. "NAT"), choose user "root" and set event to "Boot-up"
* Go to Task settings and paste the script below:

```
sleep 30
openvswitch=`ifconfig | grep ovs_eth | wc -l`
if [ $openvswitch -eq "0" ]; then 
  interface=eth0
else
  interface=ovs_eth0
fi
iptables -t nat -A POSTROUTING -s 192.168.1.0/24 -o $interface -j MASQUERADE
```
* Optionally you can setup your email to send error when script fails
* You also may also want to configure your firewall to passthrough all packets from/to the second LAN interface. This might be very different for every configuration so this is out of scope of this README.
* Plug in other device to the second LAN and Reboot your device (You also may need to setup static IP on that device)

# Script description
We use `sleep 30` to wait 30 seconds until all LAN interfaces are up. Without this the script may fail as there might be no interfaces to bind iptables rules. This is non-blocking wait, so the system is booting up properly while this script is waiting to be executed on the right time. You may also need to extend this wait, but 30 seconds should be enough.
Next we check whether the system uses Open vSwitch. If no then we use `eth0` as interface name otherwise we use `ovs_eth0`.
Last command is the NAT translating, which can be described as: All packets from/to network 192.168.1.0/24 route to through `eth0` (or `ovs_eth0`) interface.
