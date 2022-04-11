import { Container, Box, Typography } from '@mui/material';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';

const Authorization = ( { children, ...props } ) => {
    return(
        <Container disableGutters maxWidth = { false } sx = {{ display: 'flex', flexDirection: 'column', maxWidth: '100vw', maxHeight: '100vh' }}>
            <Header />
            <Container disableGutters maxWidth = {false} sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center', background: `linear-gradient(153.44deg, #3F4CC4 22.7%, #A8BB37 68.82%)`, height: '100vh', }} >
                <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between', background: `rgba(3, 141, 0, 0.14)`, boxShadow: '0px 4px 4px rgba(0, 0, 0, 0.25)', borderRadius: '2vw', width: '35vw', maxHeight: '78%', p: 4 }} >
                    <Typography variant = 'h3' > { props.label }  </Typography>
                    <> { children } </>
                </Box>
            </Container>
            <Footer />
        </Container>
    )
}

export default Authorization;