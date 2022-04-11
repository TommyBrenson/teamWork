import { Routes, Route, Navigate } from 'react-router-dom';

import Home from '../../pages/Home';
import Login from '../../pages/Login';
import Registration from '../../pages/Registration';
import NotFound from '../../pages/NotFound';
import Profile from '../../pages/Profile';
import GuestRoute from '../components/GuestRoute';
import PrivateRoute from '../components/GuestRoute';

import { Container, CircularProgress } from '@mui/material';

const AppRoutes = () => {
    const auth = { isLoaded: true }; // use api 

    return auth.isLoaded ? (
        <Routes>
            <Route path = "/" element = { <Home /> } />
            <Route 
                path = "/login" 
                element = { <GuestRoute>
                                <Login />
                            </GuestRoute> } 
            />
            <Route 
                path = "/registration" 
                element = { <GuestRoute>
                                <Registration />
                            </GuestRoute> }
            />
            <Route
                path = "/profile"
                element = { <PrivateRoute>
                                <Profile />
                            </PrivateRoute> } >

            </Route>
            <Route path = "/not-found-404" element = { <NotFound /> }/>
            <Route path = "*" element = {<Navigate to = "/not-found-404" /> } />
        </Routes>
    ) 
    : (

      <Container maxWidth = {false} sx = {{ display: 'flex', flexDirection: 'column', height: '100vh', alignItems: 'center', justifyContent: 'center' }} >
          <CircularProgress color = 'primary' size = 'medium'/>
      </Container>
        
    )
}

export default AppRoutes;