let routes= [];
let routes_list= [];

import List from '../pages/productcategorys/List.vue'
import Form from '../pages/productcategorys/Form.vue'
import Item from '../pages/productcategorys/Item.vue'

routes_list = {

    path: '/productcategorys',
    name: 'productcategorys.index',
    component: List,
    props: true,
    children:[
        {
            path: 'form/:id?',
            name: 'productcategorys.form',
            component: Form,
            props: true,
        },
        {
            path: 'view/:id?',
            name: 'productcategorys.view',
            component: Item,
            props: true,
        }
    ]
};

routes.push(routes_list);

export default routes;

