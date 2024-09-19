let routes= [];
let routes_list= [];

import List from '../pages/prices/List.vue'
import Form from '../pages/prices/Form.vue'
import Item from '../pages/prices/Item.vue'

routes_list = {

    path: '/prices',
    name: 'prices.index',
    component: List,
    props: true,
    children:[
        {
            path: 'form/:id?',
            name: 'prices.form',
            component: Form,
            props: true,
        },
        {
            path: 'view/:id?',
            name: 'prices.view',
            component: Item,
            props: true,
        }
    ]
};

routes.push(routes_list);

export default routes;

