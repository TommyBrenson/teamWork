
import Header from '../components/Header/Header';
import Main from '../components/Main/Main';
import { Container } from '@mui/material';

const Home = () => {
    return(
        <Container disableGutters maxWidth = 'xl'>
            <Header />
            <Main />
        </Container>
    )
}
export default Home;