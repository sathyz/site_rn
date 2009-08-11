#
# Update bag models
# 

delete from bag_types where code='BP';
delete from bag_types where code='TI';

update bag_types set name='Executive Bags' where name='File Bag';
update bag_types set name='Laptop Backpacks' where name='Laptop';
update bag_types set name='School/Tiffin Bags' where name like 'School%';
