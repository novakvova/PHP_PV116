import './App.css'
import HomePage from "./components/home/HomePage.tsx";
import {Route, Routes} from "react-router-dom";
import NoMatchPage from "./components/404/NoMatchPage.tsx";

const App = () => {
    return (
        <>
          <Routes>
            <Route path="/">
              <Route index element={<HomePage/>} />
              <Route path="*" element={<NoMatchPage />} />
            </Route>
          </Routes>
        </>
    )
}

export default App
