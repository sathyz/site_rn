rm -rf /var/www/test/images/thumbs
cd /var/www/test/images/Album/
for i in *; do  
	mkdir /var/www/test/images/thumbs/$i -p
	for j in $i/*; do 
		convert -resize x100 $j /home/skumar/works/repo/site_rn/images/thumbs/$j; done; done
