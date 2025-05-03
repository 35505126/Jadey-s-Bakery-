ssh -i yungling.pem ubuntu@ec2-52-220-28-88.ap-southeast-1.compute.amazonaws.com

# Jadey's Bakery Project Proposal 🥖

**Student ID:** 35505126  
**IP Address:** 52.220.28.88
** Website link ** https://jadeysbakery.site/
**© 2025 Jadey's Bakery**   
**Licensed under [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)**  

# 1. Launch EC2 instance in AWS
- Launch an instance in Asia Pacific (Singapore).
- Allocate a name, Amazon Machine Image (Ubuntu), instance type (t2.micro), generate a key pair and add a security group that allows SSH (22), HTTP (80), HTTPS(443)

# 2. Register a Domain Name with GoDaddy
- Purchase Domain Name Jadey's Bakery with GoDaddy.
- Go to DNS Management and add A record

# 3. Go to Route 53
- Create a hosted zone with domain name.
- Switch to wizard- simple routing. Record type- A, value/ route traffic to- IP address, TTL- 300 seconds.
- Define another simple record- start domain name with www, record type- CNAME and put in your domain name to value/route traffic to box, TTL- 300 seconds.
- Copy NS type- value/route traffic to four links to GoDaddy.

# 4. Go back to GoDaddy
- Go to Domain.
- Go to manage DNS.
- Go to name servers.
- Add 4 name servers.
- When copying, exclude the '.'.
- Wait 4-6 hours. 🙃

# 5. Connect to EC2
- Go to EC2 dashboard and click connect.
- Go into SSH client and follow the instructions under that tab.
- Type the command "sudo apt update && sudo apt upgrade" into CLI.
- Type the command "sudo apt install ssh apache2" into CLI.
- Type the command "ip addr" and copy ip address into Elatic IP page in AWS.

# 6. Set up static IP
- Go to Elastic IP.
- Allocate Elastic IP address and associate it with EC2 instance.

# 7. UFW
- Type the command "sudo ufw allow ssh" into CLI. This allows incoming SSH connections.
- Type the command "sudo ufw allow http" into CLI. This allows web traffic.
- Type the command "sudo ufw allow https" into CLI. This allows secure web traffic.
- Type the command "sudo ufw enable" into CLI. Enables firewall.
- Verify the command "sudo ufw status verbose"

# 8. Install SSL with Certbot
- Type the command "sudo snap install core" into CLI. This allows installs snap.
- Type the command "sudo snap refresh core" into CLI. 
- Type the command "sudo snap install --classic certbot" into CLI. This installs in classic mode.
- Type the command "sudo certbot --apache" into CLI. This automatically obtains and installs an SSL certificate for the apache server.
- Type the command "sudo certbot renew --dry-run" into CLI. This simulate the automatic renewal process to verify it works.
 
# 9. Build the website 🥸
- Type the command "cd /var/www/html" into CLI.
- Type the command "sudo nano 'change this into the file you want to access'" into CLI.
