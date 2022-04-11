import Home from "./pages/Home";
import { createTheme, ThemeProvider } from '@mui/material/styles';
import { useAuth } from './services/hooks/useAuth/';
import { useNavigate } from 'react-router-dom';
import AppRoutes from './routes/Routes';

const theme = createTheme({
    components: {
      MuiContainer: {
        defaultProps: {
          maxWidth: false,
        }
      }
    },
    pallette: {
      primary: {
        main: '#f5f5dc'
      },
      secondary: {
        main: '#100C08',
      }
    },

    typography: {
      fontFamily: `'Roboto', 'Oxygen',
      'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue'`,
      h4: {
        fontSize: '1.7em',
        'fontWeight': 300,
      },
      button: {
        'fontWeight': 400,
      },
    },
    transitions: {
      duration: {
        shortest: 150,
        shorter: 200,
        short: 250,
        // most basic recommended timing
        standard: 300,
        // this is to be used in complex animations
        complex: 375,
        // recommended when something is entering screen
        enteringScreen: 225,
        // recommended when something is leaving screen
        leavingScreen: 195,
      },
    },
});

function App() {
  const auth = useAuth();
  const navigate = useNavigate();
  return (
    <ThemeProvider theme={theme}>
      <AppRoutes>
        <Home />
      </AppRoutes>
    </ThemeProvider>
  );
}

export default App;
