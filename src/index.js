import React, { StrictMode } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import './index.scss';
import './scrollbar.scss';
import App from './App';
import AuthProvider from './services/providers/AuthProvider';

ReactDOM.render(
    <StrictMode>
      <AuthProvider>
        <BrowserRouter>
          <App />
        </BrowserRouter>
      </AuthProvider>
    </StrictMode>,
  document.getElementById('root')
);

