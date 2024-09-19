let routes= [];

import dashboard from "./vue-routes-dashboard";
import productcategorys from "./vue-routes-productcategorys";

routes = routes.concat(dashboard);
routes = routes.concat(productcategorys);

export default routes;
