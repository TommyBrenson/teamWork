import { Container, Box, Typography } from '@mui/material';

const NotFound = () => {

    return (
        <Container disableGutters maxWidth = {false} >
            <Box color = 'common.black' sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'flex-start', pt: 5 }}>
                <Typography variant = 'h1'>404</Typography>
                <Typography variant = 'h2'>Page not found</Typography>
            </Box>
        </Container>
    );
}

export default NotFound;