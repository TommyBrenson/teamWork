
import Header from '../../components/Header/Header';
import Main from '../../components/Main/Main';
import Footer from '../../components/Footer/Footer';
import { Container } from '@mui/material';

const Home = () => {
    return(
        <Container disableGutters maxWidth = 'false'>
            <Header />
            <Main />
            <Footer />
        </Container>
    )
}
export default Home;