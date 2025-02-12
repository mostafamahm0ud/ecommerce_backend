CREATE OR REPLACE VIEW itemsview AS
SELECT items.* , categories.categories_name FROM items
INNER JOIN categories ON categories.categories_id = items.items_categories ; 

SELECT itemsview.* , 1 AS favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userId
WHERE items_categories = $category_id
UNION ALL 
SELECT * , 0 AS favorite FROM itemsview
WHERE items_categories = $category_id AND items_id NOT IN (SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userId)



-- myfavorite view --
CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.* , items.* , users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_usersid
INNER JOIN items ON items.items_id = favorite.favorite_itemsid



SELECT SUM(itemsprice) as totalprice ,SUM(countitems) as totalcount FROM `cartview` WHERE cartview.cart_userid = 2
GROUP BY cart_userid


-- cart view --
CREATE OR REPLACE VIEW cartview AS
SELECT 
    SUM(items.items_price) AS itemsprice, 
    COUNT(cart.cart_itemid) AS countitems,
    cart.*,
    items.*
FROM 
    cart
INNER JOIN 
    items ON items.items_id = cart.cart_itemid 
GROUP BY 
   cart.cart_userid, cart.cart_itemid;