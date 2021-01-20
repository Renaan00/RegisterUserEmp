import { Switch , Route } from 'react-router-dom';

import App from '../App';
import Menu from '../Menu';

const Routes = () => {
    return(
        <Switch>
            <Route path="/" component={App} exact/>
            <Route path="/Menu/:id/" component={Menu}/>
            <Route component={() => <div>Page Error 404!</div>}/>
        </Switch>
    );
}
export default Routes;

