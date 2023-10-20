cp /home/site/wwwroot/azure-app-service/nginx.conf /etc/nginx/sites-available
# or -if you are storing the nginx.conf in your Git repository-:
# cp /home/site/repository/azure-app-service/nginx.conf /etc/nginx/sites-available/default
mv nginx.conf default
service nginx restart