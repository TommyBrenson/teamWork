import { Navigate, useLocation } from 'react-router-dom';
import { useAuth } from '../../../services/hooks/useAuth';

const PrivateRoute = ( { children } ) => {
    const auth = useAuth();
    const location = useLocation();
    const url = new URLSearchParams();
    url.set("redirect", location.pathname + location.search);

    return auth.user ? (
        children
    ) : (
        <Navigate
            to = {{
                pathname: "/",
                search: url.toString(),
            }} 
        />
    );
}

export default PrivateRoute;