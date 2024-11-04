# PAQT Assignment

## Overview

This assignment showcases multiple modules adhering to software design principles, with a focus on flexibility, scalability, and test coverage.

---

### Task 1: `App\Modules\Multipliable`

The `Multipliable` module is designed in alignment with the SOLID principles, ensuring flexibility and easy scalability.

**Tests**: Unit tests for this module are located at `tests/Unit/Modules/Multipliable`.

---

### Task 2: `App\Modules\Splitter`

The `Splitter` module utilizes native PHP functions to achieve the required functionality.

**Tests**: Unit tests for this module are available at `tests/Unit/Modules/Splitter`.

---

### Task 3: `App\Modules\DayInPeriod`

The `DayInPeriod` module is designed to support extensions, making it easy to adjust the starting day, such as setting Tuesday as the first day of the period. This implementation demonstrates a strong adherence to the Open/Closed Principle.

**Tests**: Unit tests for this module can be found at `tests/Unit/Modules/DayInPeriod`.

---

### Task 4: The Main Module

The main module implements a straightforward Laravel-based approach. While there are opportunities for improvement—such as creating separate modules, using injectable repositories for isolating database queries, implementing policies, and developing custom API responses with messages, error codes, and status codes—the current solution prioritizes simplicity given the constraints.

---
