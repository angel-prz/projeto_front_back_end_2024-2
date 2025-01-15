## **Checklist de Requisitos Front-End**

### **5.1 Estrutura Semântica e Acessibilidade**
- [x] [Uso de elementos semânticos do HTML5 (`<header>`, `<nav>`, `<main>`, etc.").](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/1ea925bcea77b459cefd366e3eac5a4610ea982d/projeto/view/listarPaciente.php#L6)
- [x] [Texto alternativo para imagens.](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/970ed28355892f3cbf76c4eeeabc376abccca2fe/projeto/view/listarPaciente.php#L34)  
- [ ] Navegação funcional via teclado.  
- [ ] Contraste adequado entre texto e fundo.  
- [X] Labels descritivos em formulários.  
- [ ] Feedback visual claro para elementos em foco.  

---

### **5.2 Responsividade**
- [x] Uso de Flexbox e/ou CSS Grid em pelo menos 2 páginas. [Flexbox]()[Grid](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/351dc32dc257c21657d31146c0561bccb3649324/projeto/css/style.css#L21)
- [X] [Aplicação de media queries para adaptar o design a diferentes dispositivos.](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/75ed47adb62babe7d7825213dae60ee662d47fb0/projeto/css/style.css#L38)  
- [X] [Abordagem mobile-first e uso de unidades relativas (%, em, rem).](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/351dc32dc257c21657d31146c0561bccb3649324/projeto/css/style.css#L1) 

---

### **5.3 CSS Modular e Organizado**
- [x] Estilos separados por componentes ou páginas.  
- [X] [Uso de pseudo-classes (e.g., :hover, :focus) para melhorar a interação.](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/351dc32dc257c21657d31146c0561bccb3649324/projeto/css/style.css#L127)

---

### **5.4 JavaScript Interativo**
- [x] Manipulação do DOM.  
- [X] Validação de formulários.  
- [ ] Uso de métodos avançados (e.g., filter, map, reduce).  

---

### **5.5 Validações e Feedbacks**
- [X] Validação de campos obrigatórios e formatos de entrada.  
- [X] Feedback claro ao usuário sobre ações e erros.  

---

### **5.6 Uso de API**
- [ ] Integração com pelo menos 2 APIs do HTML5 (e.g., [Geolocation](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/view/mostrarConsultas.php#L1), Web Storage, Drag and Drop, Fetch).  
- [ ] Utilização opcional de APIs externas para enriquecer funcionalidades.  

---

### **5.7 Boas Práticas de Código e Documentação**
- [ ] Código bem organizado e comentado.  
- [X] Documento descritivo detalhado sobre o projeto (motivações, público-alvo, tecnologias, etc.).  

---

### **5.8 Design e Usabilidade**
- [ ] Aplicação de princípios de usabilidade (e.g., simplicidade e consistência).  
- [ ] Interface visualmente agradável e intuitiva.  

---

### **5.9 Elementos de Interface e Navegação**
- [ ] [Carrossel: Exibição dinâmica de imagens ou conteúdo.](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/css/carrossel.css#L1)  
- [ ] Breadcrumbs: Indicação hierárquica de navegação.  
- [x] Menus suspensos ou hambúrguer: Navegação funcional e adaptável. (Menu hamburger) [CSS](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/css/navbar.css#L1) , [Javascript](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/scripts/carrossel.js#L1), [HTML](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/view/mostrarExames.php#L1)
- [x] Modais: Janelas pop-up para mensagens ou formulários. (Formulário em janela modal) [CSS](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/css/modal.css#L1), [Javascript](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/scripts/modal.js#L1) [HTML](https://github.com/angel-prz/projeto_front_back_end_2024-2/blob/66012c3f58ba64889dda24ceedfe666471d302fe/projeto/view/listarPaciente.php#L73)
- [ ] Tabs (abas): Organização de conteúdos por categorias.  
- [ ] Accordion: Expansão e colapso de informações.  
