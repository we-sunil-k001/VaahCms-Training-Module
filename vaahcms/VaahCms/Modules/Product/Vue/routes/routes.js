let routes= [];

import dashboard from "./vue-routes-dashboard";
import productcategorys from "./vue-routes-productcategorys";
import products from "./vue-routes-products";

routes = routes.concat(dashboard);
routes = routes.concat(productcategorys);
routes = routes.concat(products);

export default routes;
