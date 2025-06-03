ssh -i yungling.pem ubuntu@ec2-52-220-28-88.ap-southeast-1.compute.amazonaws.com

# Jadey's Bakery Project Proposal 🥖

**Student ID:** 35505126  
**IP Address:** 52.220.28.88  
**Website link** https://jadeysbakery.site/  
**© 2025 Jadey's Bakery**   
**Licensed under [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)**  

**Project Overview:**
The aim of the project is to create a IaaS that enables multifaceted usage within the sphere of baking to a wide variety of stakeholders. Jadey’s Bakery is the home of sourdoughs for the soul, secret recipes, and organic ingredients. Whether you’re an Individual chasing the next flavour hit, a business looking to purchase/supply ingredients, or a hobbyist with untold recipes, Jadey's bakery kneads all realms of baked goodness in one place. Partnerships with local businesses to purchase baking equipment and quality produce is advanced through an online SaaS that connects suppliers, and customers through an interactive open platform. Customers can leave feedback on ingredients, share ideas, post photos, comment, rate, and review recipes. Inventory tracker software boosts efficiency by streamlining orders on products, saving the need for manual ordering or forgetful minds. Implementation of algorithms that tailor to specific health needs make selecting specific recipes, ingredients, or products faster and easier. The online website will provide fast delivery options, as well as a local pickup storefront that online orders can be collected from. This will maximise efficiency for stakeholders as well as giving a chance to interact in person with the bakery storefront, something that is missing in a purely digital online store. Connectivity through baking is the central theme of Jadey’s Bakery, providing an interactive baking website, as such a monthly leaderboard for the best sourdough will be posted and shared. This will promote sharing of ideas and inspire competition, with the grand reward of publicity, as a business or individual. A membership program will also be provided where local businesses will receive a discount on monthly orders, while individuals receive discount coupons on individual orders.

## Jadey’s Bakery – Project Timeline

**Week 1 (May 10–17):**
- Created initial static HTML layout
- Planned site features
- Started GitHub tracking

**Week 2 (May 17–24):**
- Switched to WordPress for scalability
- Installed Astra theme
- Set up basic pages and navigation

**Week 3 (May 24–31):**
- Integrated AWS SES for contact form
- Set up SSL with Let’s Encrypt
- Started inventory tracking PHP script

**Week 4 (June 1–7):**
- Finalized theme and styling
- Fixed HTTPS redirection
- Configured domain + cleaned WordPress

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
- Type the command ```sudo apt update && sudo apt upgrade``` into CLI.
- Type the command ```sudo apt install ssh apache2``` into CLI.
- Type the command ```ip addr``` and copy ip address into Elatic IP page in AWS.

# 6. Set up static IP
- Go to Elastic IP.
- Allocate Elastic IP address and associate it with EC2 instance.

# 7. UFW
- Type the command ```sudo ufw allow ssh``` into CLI. This allows incoming SSH connections.
- Type the command ```sudo ufw allow http``` into CLI. This allows web traffic.
- Type the command ```sudo ufw allow https``` into CLI. This allows secure web traffic.
- Type the command ```sudo ufw enable``` into CLI. Enables firewall.
- Verify the command ```sudo ufw status verbose```.

# 8. Install SSL with Certbot
- Type the command ```sudo snap install core``` into CLI. This allows installs snap.
- Type the command ```sudo snap refresh core``` into CLI. 
- Type the command ```sudo snap install --classic certbot``` into CLI. This installs in classic mode.
- Type the command ```sudo certbot --apache``` into CLI. This automatically obtains and installs an SSL certificate for the apache server.
- Type the command ```sudo certbot renew --dry-run``` into CLI. This simulate the automatic renewal process to verify it works.

# 9. Download MySQL & wordpress on Ubuntu EC2 🥸
- Type the command ```sudo apt update```.
- Type the command ```sudo apt install mysql-server -y```.
- Type the command ```sudo mysql_secure_installation```.
- Type the command ```sudo apt install php libapache2-mod-php php-mysql``` to install php.
- Make sure you set up a strong root password, remove anonymous users, disallow remote root login, remove test database and reload priviledge tables.
- Log in to sql with the command ```sudo mysql```.
- Type these commands replacing the password.
- Type the command ```CREATE DATABASE wordpress;```
- Type the command ```CREATE USER 'wpuser'@'localhost' IDENTIFIED BY 'Password';```
- Type the command ```GRANT ALL PRIVILEGES ON wordpress.* TO 'wpuser'@'localhost';```
- Type the command ```FLUSH PRIVILEGES;```
- Type the command ```EXIT;```
- Type the command ```cd /tmp``` then ```wget https://wordpress.org/latest.tar.gz```
- Unzip the file ```tar -xvzf latest.tar.gz```
- ```sudo cp -a wordpress/. /var/www/html/``` move the wordpress folder into apache root file.

- 
- Explanation: They will create a table of inventory storing a numerical ID that increments with each row, SKU that stores up to 50 characters, name that can be up to 255 characters and the quantity of the integers. Source: https://github.com/Luna-390/PHP-Barcode-Reader/blob/master/database.sql
```sql
CREATE DATABASE jadeys_bakery;
USE jadeys_bakery;

CREATE TABLE inventory (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sku VARCHAR(50) NOT NULL UNIQUE,
  name VARCHAR(255) NOT NULL,
  quantity INT NOT NULL DEFAULT 0
);
```
 
# 11. Wordpress 🥸
- Choose a template and start establishing your website's homepage.

# 12. WP Recipe Maker
- Install a plugin on wordpress page called WP Recipe Maker.
- Activate plugin.
- Choose the wordpress editor for the plugin.
- Go to pages.
- Add a page and name it "Recipes".
- Click the + on the top left.
- Drag and drop "WPRM Recipe" and "Recipe snippet" to the page

# 13. WP User Frontend
- Install WP User Frontend plugin.
- Create your first form: Submit Recipe Form
- Edit the form and add recipe title, upload picture, ingredients list, instructions and ratings.

# 14. Link Amazon SES
- Enter your email address for the website.
- Fill in your domain name and follow through with the set up process.
- Verify your email address.
- Add DKIM records to Route 53.

# 15. Edit contact us form and link to SES.

- Add all the fields require in WP form: Name, email and message.
- Go to the “Notifications” tab on the left to confirm where the emails are sent.
- Send to your email address, name email subject.
- Install WP Mail SMTP from Plugins > Add New

  





# 12. InstallDocker
- Type the command ```sudo apt update```.
- Type the command ```sudo apt install -y docker.io docker-compose```
- ```sudo apt install -y ca-certificates curl gnupg lsb-release```
- Type the command ```sudo usermod -aG docker $USER```
- Type the command ```mkdir ~/recipes```
- Type the command ```cd ~/recipes```
- Type the command ```nano docker-compose.yml``` I followed these links for set up. https://docs.docker.com/compose/ https://docs.docker.com/compose/compose-file/ https://www.geeksforgeeks.org/docker-compose/
- 
- ```python3 -c "import secrets; print(secrets.token_urlsafe(64))"``` to generate a secret key.
- ```sudo .env```Paste the key into the folder.
- ```docker --version```
- ```docker compose version```
- ```docker compose up -d```
- ```docker ps``` Check the container is running.
- ```sudo systemctl start docker``` Start the Docker daemon.
- ```sudo systemctl status docker``` To verify it is running.
- ```docker exec -it recipes-web-1 python manage.py createsuperuser``` to create a admin login. Enter your username, email address and password.

- 



- 

- 

- https://stackoverflow.com/questions/65344947/pdo-insert-update-on-duplicate-key?
- https://github.com/cp6/PHP-PDO-MySQL-cheat-sheet?
